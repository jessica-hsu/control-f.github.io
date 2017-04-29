using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace searchInput {
    [XamlCompilation(XamlCompilationOptions.Compile)]
    public partial class LogInPage : ContentPage {
        public LogInPage() {
            InitializeComponent();
        }

        async void GOOGLE_Clicked(object sender, EventArgs e) {
            await Navigation.PushAsync(new MenuPage());
        }
    }
}
