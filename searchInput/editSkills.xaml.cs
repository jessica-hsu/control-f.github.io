using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace searchInput
{
	[XamlCompilation(XamlCompilationOptions.Compile)]
	public partial class editSkills : ContentPage
	{
        string s_ID;
        string selected_skill;
        public editSkills (string userID, string s_skill)
		{
            s_ID = userID;
            selected_skill = s_skill;
            
			InitializeComponent ();
            
		}

        

        private void buildskill()
        {
            
            MySqlConnection sqlconn;
            string connsqlstring = "Server=mydbinstance.cvjenxnjjyrk.us-west-2.rds.amazonaws.com;Port=3306;database=mydbinstance;User Id=admin;Password=admin123;charset=utf8";
            sqlconn = new MySqlConnection(connsqlstring);
            sqlconn.Open();
            string skill_query = "insert into userSkill values('"+selected_skill+"', "+s_ID+", "+years_e.Text+", '"+ portf_e+"');";
            MySqlCommand skillsqlcmd = new MySqlCommand(skill_query, sqlconn);
            skillsqlcmd.ExecuteScalar();
            
            sqlconn.Close();
            
        }

        async void submit_button_Clicked(object sender, EventArgs e)
        {
            if (years_e.Text == "" || portf_e.Text == "")
            {
                await DisplayAlert("Please complete the entries", "", "OK");
            }
            else
            {
                buildskill();
                await Navigation.PushAsync(new yourDev(s_ID));
            }
        }
    }
}
