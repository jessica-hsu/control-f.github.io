using System;
using Xamarin.Forms;
using System.Threading.Tasks;
using System.Collections.Generic;

namespace searchInput {
    public class MenuPage : ContentPage {
        StackLayout layout;

        public MenuPage() {
            layout = new StackLayout() {
                Orientation = StackOrientation.Vertical,
                VerticalOptions = LayoutOptions.Center,
                HorizontalOptions = LayoutOptions.Center,
                Spacing = 8,
                Padding = 16
            };

            var headingLayout = new StackLayout {
                Orientation = StackOrientation.Horizontal,
                HorizontalOptions = LayoutOptions.Center,
                VerticalOptions = LayoutOptions.Center,
                Children = {
                    new Image {
                        Source = "icon.png"
                    },
                    new Label {
                        Text = "Control",
                        HorizontalTextAlignment = TextAlignment.End,
                        FontSize = 60,
                        TextColor = Color.FromHex ("#34495E")
                    },
                    new Label {
                        Text = "-F",
                        HorizontalTextAlignment = TextAlignment.Start,
                        FontSize = 60,
                        TextColor = Color.FromHex ("#3498DB")
                    }
                }
            };
            layout.Children.Add(headingLayout);

            var instructionsLabel = new Label() {
                Text = "Finding a freelancer or gaining experience should be as easy as a keyboard command.",
                HorizontalOptions = LayoutOptions.FillAndExpand,
                HorizontalTextAlignment = TextAlignment.Center,
                Margin = 20
            };
            layout.Children.Add(instructionsLabel);

            var trackButton = new Button() {
                Text = "  How it works  ",
                HorizontalOptions = LayoutOptions.Center,
                BackgroundColor = Color.FromHex("ECECEC")
            };
            layout.Children.Add(trackButton);

            //trackButton.Clicked += async (sdender, args) => {
            //    await Navigation.PushAsync(new FingerPaintPage());
            //};

            var identifyButton = new Button() {
                Text = "        Profile       ",
                HorizontalOptions = LayoutOptions.Center,
                BackgroundColor = Color.FromHex("DADFE1")
            };
            layout.Children.Add(identifyButton);

            identifyButton.Clicked += async (sdender, args) => {
               await Navigation.PushAsync(new yourDev("1"));
            };

            var warningButton = new Button() {
                Text = "        Search        ",
                HorizontalOptions = LayoutOptions.Center,
                BackgroundColor = Color.FromHex("F4D03F")
            };
            layout.Children.Add(warningButton);

            warningButton.Clicked += async (sender, args) => {
                await Navigation.PushAsync(new MainPage());
            };

            var errorButton = new Button() {
                Text = "    Contact Us    ",
                HorizontalOptions = LayoutOptions.Center,
                BackgroundColor = Color.FromHex("EF4836")
            };
            layout.Children.Add(errorButton);

            //errorButton.Clicked += async (sdender, args) => {
            //    await Navigation.PushAsync(new FingerPaintPage3());
            //};

            var crashButton = new Button() {
                Text = "        Logout        ",
                HorizontalOptions = LayoutOptions.Center,
                BackgroundColor = Color.FromHex("CF000F")
            };
            layout.Children.Add(crashButton);

            //crashButton.Clicked += async (sdender, args) => {
            //    await Navigation.PushAsync(new FingerPaintPage4());
            //};

            //Padding = Device.OnPlatform<Thickness>(new Thickness(0, 20, 0, 0), 0, 0);

            foreach (var view in layout.Children) {
                // Hide all the children
                view.Scale = 0;
            }

            Content = new ScrollView() {
                VerticalOptions = LayoutOptions.FillAndExpand,
                Content = layout
            };

        }

        protected override async void OnAppearing() {
            base.OnAppearing();

            NavigationPage.SetHasNavigationBar(this, false);

            // Show the buttons only if we have Insights configured
            foreach (var view in layout.Children) {
                await view.ScaleTo(1.1, 50, Easing.SpringIn);
                await view.ScaleTo(1, 50, Easing.SpringOut);
            }
        }
    }
}