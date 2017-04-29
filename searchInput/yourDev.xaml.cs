using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace searchInput
{
	[XamlCompilation(XamlCompilationOptions.Compile)]
	public partial class yourDev : ContentPage
	{
        public string resultSkills = "Skills: ";
        public Queue<string> queueSkill = new Queue<string>();
        public string userID = "";
        public yourDev (string uID)
		{
            
            userID = uID;
			InitializeComponent ();
            buildDevProfile(uID);
            

        }

        public void buildDevProfile(string uID)
        {
            ID.Text = uID;
            DataSet resultDataSet = new DataSet();
            try
            {

                MySqlConnection sqlconn;
                string connsqlstring = "Server=mydbinstance.cvjenxnjjyrk.us-west-2.rds.amazonaws.com;Port=3306;database=mydbinstance;User Id=admin;Password=admin123;charset=utf8";
                sqlconn = new MySqlConnection(connsqlstring);
                sqlconn.Open();

                string sName = "select firstName from user where userID='" + uID + "';";
                MySqlCommand namesqlcmd = new MySqlCommand(sName, sqlconn);
                string foundName = namesqlcmd.ExecuteScalar().ToString();
                Name.Text = foundName;

                string sAge = "select age from user where userID='" + uID + "';";
                MySqlCommand agesqlcmd = new MySqlCommand(sAge, sqlconn);
                string foundAge = agesqlcmd.ExecuteScalar().ToString();
                age.Text = foundAge;


                string sPhone = "select phone from user where userID='" + uID + "';";
                MySqlCommand phonesqlcmd = new MySqlCommand(sPhone, sqlconn);
                String foundPhone = phonesqlcmd.ExecuteScalar().ToString();
                phone.Text = foundPhone;

                string sEmail = "select email from user where userID='" + uID + "';";
                MySqlCommand emailsqlcmd = new MySqlCommand(sEmail, sqlconn);
                String foundEmail = emailsqlcmd.ExecuteScalar().ToString();
                email.Text = foundEmail;

                string des = "select uDescription from user where userID=" + uID + ";";
                MySqlCommand dessqlcmd = new MySqlCommand(des, sqlconn);
                string founddes = dessqlcmd.ExecuteScalar().ToString();
                uDes.Text = founddes;

                string  queryString = "select distinct skillName from userSkill where userSkill.userID="+uID+";";
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

        async void remove_skill_Clicked(object sender, EventArgs e)
        {


            MySqlConnection sqlconn;
            string connsqlstring = "Server=mydbinstance.cvjenxnjjyrk.us-west-2.rds.amazonaws.com;Port=3306;database=mydbinstance;User Id=admin;Password=admin123;charset=utf8";
            sqlconn = new MySqlConnection(connsqlstring);
            sqlconn.Open();


           
            string[] array = queueSkill.ToArray();

            var to_remove = await DisplayActionSheet("Select a Skill to Delete", "Cancel", null, array);
            
            string skill_query = "Delete from userSkill where skillName='" + to_remove + "' and userID=" + userID + ";";
            MySqlCommand skillsqlcmd = new MySqlCommand(skill_query, sqlconn);
            skillsqlcmd.ExecuteScalar();

            sqlconn.Close();

            await Navigation.PushAsync(new yourDev(userID));
        }

        async void add_skill_Clicked(object sender, EventArgs e)
        {

            var action = await DisplayActionSheet("Select a Skill", "Cancel", null, "android development", "game development", "Graphic Design", "HTML", "iOS mobile development", "Java", "PHP", "Python", "Socail Media", "SQL", "Swift", "Website/Web application");
            

            await Navigation.PushAsync(new editSkills(userID, action));
        }
    }
}
