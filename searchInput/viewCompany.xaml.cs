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
	public partial class viewCompany : ContentPage
	{
		public viewCompany (string[] c)
		{
			InitializeComponent ();

            cName.Text = c[1];
            buildProfile(c);
        }

        public void buildProfile(string[] compName)
        {
            try
            {

                MySqlConnection sqlconn;
                string connsqlstring = "Server=mydbinstance.cvjenxnjjyrk.us-west-2.rds.amazonaws.com;Port=3306;database=mydbinstance;User Id=admin;Password=admin123;charset=utf8";
                sqlconn = new MySqlConnection(connsqlstring);
                sqlconn.Open();
                string retContact= "select contactPerson from company where compID='"+compName[0]+"';";
                MySqlCommand consqlcmd = new MySqlCommand(retContact, sqlconn);
                String foundContact = consqlcmd.ExecuteScalar().ToString();
                contact.Text = foundContact;

                string retEmail = "select cEmail from company where compID='" + compName[0] + "';";
                MySqlCommand conEmail = new MySqlCommand(retEmail, sqlconn);
                String foundEmail = conEmail.ExecuteScalar().ToString();
                cEmail.Text = foundEmail;

                string retLink = "select linkURL from company where compID='" + compName[0] + "';";
                MySqlCommand linksqlcmd = new MySqlCommand(retLink, sqlconn);
                String foundLink= linksqlcmd.ExecuteScalar().ToString();
                link.Text = foundLink;

                string retFounder = "select Founder from company where compID='" + compName[0] + "';";
                MySqlCommand foundsqlcmd = new MySqlCommand(retFounder, sqlconn);
                String foundFounder = foundsqlcmd.ExecuteScalar().ToString();
                founder.Text = foundFounder;

                string retLocation = "select Location from company where compID='" + compName[0] + "';";
                MySqlCommand locationsqlcmd = new MySqlCommand(retLocation, sqlconn);
                String foundLocation = locationsqlcmd.ExecuteScalar().ToString();
                location.Text = foundLocation;

                string retFocus = "select Focus from company where compID='" + compName[0] + "';";
                MySqlCommand focussqlcmd = new MySqlCommand(retFocus, sqlconn);
                String foundFocus = focussqlcmd.ExecuteScalar().ToString();
                focus.Text = foundFocus;

                string retPhone = "select cPhoneNumber from company where compID='" + compName[0] + "';";
                MySqlCommand phonesqlcmd = new MySqlCommand(retPhone, sqlconn);
                String foundPhone = phonesqlcmd.ExecuteScalar().ToString();
                cPhoneNumber.Text = foundPhone;

                string des = "select cDescription from company where compID = " + compName[0] + ";";
                MySqlCommand dessqlcmd = new MySqlCommand(des, sqlconn);
                string founddes = dessqlcmd.ExecuteScalar().ToString();
                cDes.Text = founddes;

                sqlconn.Close();
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
            }
        }
	}
}
