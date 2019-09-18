using System;
using System.Collections.ObjectModel;
using System.Diagnostics;
using System.Threading.Tasks;

using Xamarin.Forms;

using AddictionManager.Models;
using AddictionManager.Views;

namespace AddictionManager.ViewModels
{
    public class CheckInViewModel : BaseViewModel
    {
        public Goal Goal { get; set; }
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
        public CheckInViewModel(Goal goal = null)
        {
            Goal = goal ?? new Goal();
        }
    }
}
