using Xamarin.Forms;
using System.Net.Http;
using Newtonsoft.Json;
using System.Collections.ObjectModel;

namespace App17
{
	public class Post 
	{
		public int Id { get; set; }
		public string Title { get; set; }
		public string Body { get; set; }
	}

	public partial class MainPage : ContentPage
	{
        private const string Url = "https://jsonplaceholder.typicode.com/posts";
        private HttpClient _client = new HttpClient();
        private ObservableCollection<Post> _posts;

		public MainPage()
		{
			InitializeComponent();
		}

		protected override async void OnAppearing()
		{
            var content = await _client.GetStringAsync(Url);
            var posts = JsonConvert.DeserializeObject<List<Post>>(content);

            _posts = new ObservableCollection<Post>(posts);
            postsListView.ItemsSource = _posts;

			base.OnAppearing();
		}

		async void OnAdd(object sender, System.EventArgs e)
		{
            var post = new Post { Title= "Title " + DateTime.Now.Ticks };


            var content = JsonConvert.SerializeObject(post);
            await _client.PostAsync(Url, new StringContent(content));

            _posts.Insert(0, post);
		}

		void OnUpdate(object sender, System.EventArgs e)
		{
		}

		void OnDelete(object sender, System.EventArgs e)
		{
		}
	}
}