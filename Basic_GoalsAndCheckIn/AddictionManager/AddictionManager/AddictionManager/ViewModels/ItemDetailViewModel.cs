 using System;
using System.Collections.Generic;
using AddictionManager.Models;
using Xamarin.Forms;
using AddictionManager.Views;
using System.Threading.Tasks;
using System.Diagnostics;

namespace AddictionManager.ViewModels
{
    public class ItemDetailViewModel : BaseViewModel
    {
        public Goal Goal { get; set; }
        public bool IsNew { get; set; }
        public String GoalName
        {
            get { return Goal.Name; }
            set { Goal.Name = value; OnPropertyChanged(); }
        }
        public int GoalStreak
        {
            get { return Goal.Streak; }
            set { Goal.Streak = value; OnPropertyChanged(); }
        }

        public ItemDetailViewModel(Goal goal = null)
        {
            IsNew = goal == null;
            Title = IsNew ? "Add goal" : "Edit goal";
            Goal = goal ?? new Goal();
            
            // Update Streak
            MessagingCenter.Subscribe<CheckInPage, Goal>(this, "UpdateStreak",
                async (sender, updatedGoal) => {
                    GoalStreak = updatedGoal.Streak;
                    await DataStore.UpdateGoalAsync(updatedGoal);
                });
        }
        
    }
}
