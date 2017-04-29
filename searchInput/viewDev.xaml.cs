using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace searchInput
{
	[XamlCompilation(XamlCompilationOptions.Compile)]
	public partial class viewDev : ContentPage
	{
		public viewDev (string[] dev)
		{
			InitializeComponent ();
            buildDev(dev);


            
		}

        public void buildDev(string[] dev)
        {
            firstName.Text = dev[1];
            lastName.Text = dev[2];
            DataSet resultDataSet = new DataSet();
            string resultSkills = "Skills: ";

         Queue<string> queueSkill = new Queue<string>();

            try
            {

                MySqlConnection sqlconn;
                string connsqlstring = "Server=mydbinstance.cvjenxnjjyrk.us-west-2.rds.amazonaws.com;Port=3306;database=mydbinstance;User Id=admin;Password=admin123;charset=utf8";
                sqlconn = new MySqlConnection(connsqlstring);
                sqlconn.Open();

                string sAge = "select age from user where userID='" + dev[0] + "';";
                MySqlCommand agesqlcmd = new MySqlCommand(sAge, sqlconn);
                string foundAge = agesqlcmd.ExecuteScalar().ToString();
                age.Text = foundAge;


                string sPhone = "select phone from user where userID='" + dev[0] + "';";
                MySqlCommand phonesqlcmd = new MySqlCommand(sPhone, sqlconn);
                String foundPhone = phonesqlcmd.ExecuteScalar().ToString();
                phone.Text = foundPhone;

                string sEmail = "select email from user where userID='" + dev[0] + "';";
                MySqlCommand emailsqlcmd = new MySqlCommand(sEmail, sqlconn);
                String foundEmail = emailsqlcmd.ExecuteScalar().ToString();
                email.Text = foundEmail;

                string des = "select uDescription from user where userID=" + dev[0] + ";";
                MySqlCommand dessqlcmd = new MySqlCommand(des, sqlconn);
                string founddes = dessqlcmd.ExecuteScalar().ToString();
                uDes.Text = founddes;

                string queryString = "select distinct skillName from userSkill where userSkill.userID=" + dev[0] + ";";
                MySqlDataAdapter adapter = new MySqlDataAdapter(queryString, sqlconn);
                adapter.Fill(resultDataSet, "Item");
                foreach (DataRow row in resultDataSet.Tables["Item"].Rows)
                {

                    queueSkill.Enqueue(row[0].ToString());
                }
                string[] array = queueSkill.ToArray();
                int length = array.Length;
                for (int i = 0; i < length; i++)
                {
                    resultSkills = resultSkills + Environment.NewLine + array[i];
                }
                skills.Text = resultSkills;


                sqlconn.Close();
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
            }

        }
	}
}
