using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Xamarin.Forms;
using MySql.Data.MySqlClient;
using System.Data;
using Auth0;

namespace searchInput
{
    
    public partial class MainPage : ContentPage
    {
        string firstInput = "";
        string secondInput = "";
        
        public void Picker_SelectedIndexChanged(object sender, EventArgs e)
        {
            clearPickerTwo(firstInput);
            var name = searchPicker.Items[searchPicker.SelectedIndex];
            firstInput = name;
            b(firstInput);
            
        }
        public void b(string fristInput)
        {


            if (firstInput == "Developer")
            {
                secondPicker.Items.Add("Android Development");
                secondPicker.Items.Add("Game Development");
                secondPicker.Items.Add("Graphic Design");
                secondPicker.Items.Add("HTML");
                secondPicker.Items.Add("IOS Mobile Development");
                secondPicker.Items.Add("Java");
                secondPicker.Items.Add("PHP");
                secondPicker.Items.Add("Python");
                secondPicker.Items.Add("SQL");
                secondPicker.Items.Add("Website/Web Application");
            }
            if (firstInput == "Company")
            {
                secondPicker.Items.Add("Health & Medicine");
                secondPicker.Items.Add("Environment");
                secondPicker.Items.Add("Eductional Technology");
                secondPicker.Items.Add("Other");
            }
            if (firstInput == "Advert")
            {
                secondPicker.Items.Add("Mobile -IOS Application");
                secondPicker.Items.Add("Mobile - Android Application");
                secondPicker.Items.Add("Website/Web Application");
                secondPicker.Items.Add("Game Development");
                secondPicker.Items.Add("Social Media");

            }
        }

        public void clearPickerTwo(string firstInput)
        {
            if (firstInput == "Developer")
            {
                secondPicker.Items.Remove("Android Development");
                secondPicker.Items.Remove("Game Development");
                secondPicker.Items.Remove("Graphic Design");
                secondPicker.Items.Remove("HTML");
                secondPicker.Items.Remove("IOS Mobile Development");
                secondPicker.Items.Remove("Java");
                secondPicker.Items.Remove("PHP");
                secondPicker.Items.Remove("Python");
                secondPicker.Items.Remove("SQL");
                secondPicker.Items.Remove("Website/Web Application");
            }
            if (firstInput == "Company")
            {
                secondPicker.Items.Remove("Health & Medicine");
                secondPicker.Items.Remove("Environment");
                secondPicker.Items.Remove("Eductional Technology");
                secondPicker.Items.Remove("Other");
            }
            if (firstInput == "Advert")
            {
                secondPicker.Items.Remove("Mobile -IOS Application");
                secondPicker.Items.Remove("Mobile - Android Application");
                secondPicker.Items.Remove("Website/Web Application");
                secondPicker.Items.Remove("Game Development");
                secondPicker.Items.Remove("Socail Media");
            }
        }

        public MainPage()
        {
           

            InitializeComponent();
            secondPicker.Items.Add("");


        }




        async void Button_Clicked(object sender, System.EventArgs e)
        {
            
            await Navigation.PushAsync(new searchResult(firstInput, secondInput));
        }

        private void secondPicker_SelectedIndexChanged(object sender, EventArgs e)
        {
            var picked= secondPicker.Items[secondPicker.SelectedIndex];
            secondInput = picked;
            



        }

        async void Button_Clicked_2(object sender, EventArgs e)
        {
            string compid = "1";
            await Navigation.PushAsync(new yourCompany(compid));

        }
    }
}
