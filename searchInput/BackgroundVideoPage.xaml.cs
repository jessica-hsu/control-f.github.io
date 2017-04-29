using System;
using System.Diagnostics;
using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace searchInput {
    public partial class BackgroundVideoPage : ContentPage {

        public BackgroundVideoPage() {
            InitializeComponent();
            //video.OnFinishedPlaying = () => { Debug.WriteLine("Video Finished"); };
        }

        async void SignUp_Clicked(object sender, EventArgs e) {
            await Navigation.PushAsync(new SignUpPage());
        }

        async void LogIn_Clicked(object sender, EventArgs e) {
            await Navigation.PushAsync(new LogInPage());
        }
    }
}