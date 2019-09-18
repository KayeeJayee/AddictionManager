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
    public partial class ItemDetailPage : ContentPage
    {
        ItemDetailViewModel viewModel;
        public ItemDetailPage(ItemDetailViewModel viewModel)
        {
            InitializeComponent();
            this.viewModel = viewModel;
            BindingContext = this.viewModel;
        }

        public ItemDetailPage()
        {
            InitializeComponent();
            viewModel = new ItemDetailViewModel();
            BindingContext = viewModel;
        }
        public void Cancel_Clicked(object sender, EventArgs eventArgs)
        {
            Navigation.PopModalAsync();
        }

        public void Save_Clicked(object sender, EventArgs eventArgs)
        {
            var message = viewModel.IsNew ? "SaveGoal" : "UpdateGoal";
            MessagingCenter.Send(this, message, viewModel.Goal);
            Navigation.PopModalAsync();
        }
        async void CheckIn_Clicked(object sender, EventArgs eventArgs) // new here
        {
            await Navigation.PushModalAsync(new NavigationPage(new CheckInPage(new CheckInViewModel(viewModel.Goal))));
        }
    }
}