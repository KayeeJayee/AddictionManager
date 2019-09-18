using System;
using System.ComponentModel;
using Xamarin.Forms;
using Xamarin.Forms.Xaml;

using AddictionManager.Models;
using AddictionManager.ViewModels;
using AddictionManager.Services;
using System.Collections.Generic;

namespace AddictionManager.Views
{
    //[XamlCompilation(XamlCompilationOptions.Compile)]
    public partial class CheckInPage : ContentPage
    {
        CheckInViewModel viewModel;
        public CheckInPage(CheckInViewModel viewModel)
        {
            InitializeComponent();
            this.viewModel = viewModel;
            BindingContext = this.viewModel;
        }

        public CheckInPage()
        {
            InitializeComponent();
            viewModel = new CheckInViewModel();
            BindingContext = viewModel;
        }
        public void Cancel_Clicked(object sender, EventArgs eventArgs)
        {
            Navigation.PopModalAsync();
        }
        public void Yes_Clicked(object sender, EventArgs eventArgs)
        {
            viewModel.Goal.Streak++;
            MessagingCenter.Send(this, "UpdateStreak", viewModel.Goal);
            Navigation.PopModalAsync();
        }
        public void No_Clicked(object sender, EventArgs eventArgs)
        {
            viewModel.Goal.Streak = 0;
            MessagingCenter.Send(this, "UpdateStreak", viewModel.Goal);
            Navigation.PopModalAsync();
            // only updating the items view, not item detail or check in
        }
    }
}