using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace searchInput
{
	[XamlCompilation(XamlCompilationOptions.Compile)]
	public partial class createAdvert : ContentPage
	{
        string compID = "";
        string typeInput = "";
        string statusInput = "";
		public createAdvert (string cID)
		{
            compID = cID;
			InitializeComponent ();

		}

        void Button_Clicked(object sender, EventArgs e)
        {
            try
            {
                MySqlConnection sqlconn;
                string connsqlstring = "Server=mydbinstance.cvjenxnjjyrk.us-west-2.rds.amazonaws.com;Port=3306;database=mydbinstance;User Id=admin;Password=admin123;charset=utf8";
                sqlconn = new MySqlConnection(connsqlstring);
                sqlconn.Open();
                string aIDQuery = "select max(advertID) from advert;";
                MySqlCommand aIDsqlcmd = new MySqlCommand(aIDQuery, sqlconn);
                int advertID = (Int32.Parse(aIDsqlcmd.ExecuteScalar().ToString()) + 1);


                string by = "insert advert values(" + advertID+", " + compID + ", '" + title.Text + "', " + "'23.12.1992 00:00:00'" + ", '"+Description.Text + "', '"+typeInput+"', '"+statusInput+"');";
                MySqlCommand postBysqlcmd = new MySqlCommand(by, sqlconn);
                postBysqlcmd.ExecuteScalar();
                sqlconn.Close();
            }
            catch(Exception ex)
            {
                Console.WriteLine(ex.Message);
            }

           
        }

        private void type_SelectedIndexChanged(object sender, EventArgs e)
        {
            var picked = type.Items[type.SelectedIndex];
            typeInput = picked;

        }

        private void status_SelectedIndexChanged(object sender, EventArgs e)
        {
            var picked = status.Items[status.SelectedIndex];
            statusInput = picked;
        }
    }
}
