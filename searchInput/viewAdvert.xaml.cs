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
	public partial class viewAdvert : ContentPage
	{
		public viewAdvert (string[] a)
		{
			InitializeComponent ();
            
            buildAdvert(a);
		}

        public void buildAdvert(string[] ad)
        {
            title.Text = ad[1];
            try
            {

                MySqlConnection sqlconn;
                string connsqlstring = "Server=mydbinstance.cvjenxnjjyrk.us-west-2.rds.amazonaws.com;Port=3306;database=mydbinstance;User Id=admin;Password=admin123;charset=utf8";
                sqlconn = new MySqlConnection(connsqlstring);
                sqlconn.Open();

                string by = "select cName from company, advert where advertID='" + ad[0] + "' and advert.compID=company.compID;";
                MySqlCommand postBysqlcmd = new MySqlCommand(by, sqlconn);
                string foundPostBy = postBysqlcmd.ExecuteScalar().ToString();
                postBy.Text = foundPostBy;


                string sType = "select type from advert where advertID='" + ad[0] + "';";
                MySqlCommand typesqlcmd = new MySqlCommand(sType, sqlconn);
                String foundType = typesqlcmd.ExecuteScalar().ToString();
                type.Text = foundType;

                string sStatus = "select status from company where advertID='" + ad[0] + "';";
                MySqlCommand statussqlcmd = new MySqlCommand(sStatus, sqlconn);
                String foundStatus = statussqlcmd.ExecuteScalar().ToString();
                status.Text = foundStatus;
                

                sqlconn.Close();
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
            }
        }
	}
}
