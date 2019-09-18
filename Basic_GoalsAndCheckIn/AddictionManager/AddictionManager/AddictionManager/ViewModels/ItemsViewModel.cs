using System;
using System.Collections.ObjectModel;
using System.Diagnostics;
using System.Threading.Tasks;

using Xamarin.Forms;

using AddictionManager.Models;
using AddictionManager.Views;

namespace AddictionManager.ViewModels
{
    public class ItemsViewModel : BaseViewModel
    {
        public ObservableCollection<Goal> Goals { get; set; }
        public Command LoadItemsCommand { get; set; }

        public ItemsViewModel()
        {
            Title = "Browse";
            Goals = new ObservableCollection<Goal>();
            LoadItemsCommand = new Command(async () => await ExecuteLoadItemsCommand());
            // Save goal
            MessagingCenter.Subscribe<ItemDetailPage, Goal>(this, "SaveGoal",
                async (sender, goal) => {
                    Goals.Add(goal);
                    await DataStore.AddGoalAsync(goal);
                });
            // Update goal 
            MessagingCenter.Subscribe<ItemDetailPage, Goal>(this, "UpdateGoal",
                async (sender, goal) => {
                    await DataStore.UpdateGoalAsync(goal);
                    await ExecuteLoadItemsCommand();
                });
            // Update Streak
            MessagingCenter.Subscribe<CheckInPage, Goal>(this, "UpdateStreak",
                async (sender, updatedGoal) => {
                    await DataStore.UpdateGoalAsync(updatedGoal);
                    await ExecuteLoadItemsCommand();
                });
            
        }

        async Task ExecuteLoadItemsCommand()
        {
            if (IsBusy)
                return;

            IsBusy = true;

            try
            {
                Goals.Clear();
                var goals = await DataStore.GetGoalAsync();
                foreach (var goal in goals)
                {
                    Goals.Add(goal);
                }
            }
            catch (Exception ex)
            {
                Debug.WriteLine(ex);
            }
            finally
            {
                IsBusy = false;
            }
        }
    }
}