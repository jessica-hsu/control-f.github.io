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
	public partial class searchResult : ContentPage
	{
        string fq = "";
        public searchResult(string f, string s)
        {
            
           
            InitializeComponent();
            listView.ItemsSource= buildList(f, s);
            
        }

        public List<string> buildList(string firstQuery, string secondQuery)
        {
            DataSet resultDataSet = new DataSet();
            List<string> results = new List<string>();
            try
            {

                MySqlConnection sqlconn;
                string connsqlstring = "Server=mydbinstance.cvjenxnjjyrk.us-west-2.rds.amazonaws.com;Port=3306;database=mydbinstance;User Id=admin;Password=admin123;charset=utf8";
                sqlconn = new MySqlConnection(connsqlstring);
                sqlconn.Open();
                string queryString = "";
                
                if (firstQuery =="Developer")
                {
                    fq = firstQuery;
                    if (secondQuery=="") {
                        queryString = "select userID, firstName, lastName from user;";
                        MySqlDataAdapter adapter = new MySqlDataAdapter(queryString, sqlconn);
                        adapter.Fill(resultDataSet, "Item");
                        foreach (DataRow row in resultDataSet.Tables["Item"].Rows)
                        {
                            results.Add(row[0].ToString()+" "+row[1].ToString()+" "+row[2].ToString());
                        }
                    }
                    else
                    {
                        queryString= "select user.userID, firstName, lastName from user, userSkill where skillName = '" + secondQuery + "' and userSkill.userID = user.userID;";
                        MySqlDataAdapter adapter = new MySqlDataAdapter(queryString, sqlconn);
                        adapter.Fill(resultDataSet, "Item");
                        foreach (DataRow row in resultDataSet.Tables["Item"].Rows)
                        {
                            results.Add(row[0].ToString() + " " + row[1].ToString() + " " + row[2].ToString());
                        }

                    }
                }
                if (firstQuery == "Company")
                {
                    fq = firstQuery;
                    if (secondQuery=="") {
                        queryString = "select compID, cName from company;";
                        MySqlDataAdapter adapter = new MySqlDataAdapter(queryString, sqlconn);
                        adapter.Fill(resultDataSet, "Item");
                        foreach (DataRow row in resultDataSet.Tables["Item"].Rows)
                        {
                            results.Add(row[0].ToString()+" "+row[1].ToString());
                        }

                    }

                    else
                    {
                        queryString = "select compID, cName from company where Focus='" + secondQuery + "';";
                        MySqlDataAdapter adapter = new MySqlDataAdapter(queryString, sqlconn);
                        adapter.Fill(resultDataSet, "Item");
                        foreach (DataRow row in resultDataSet.Tables["Item"].Rows)
                        {
                            results.Add(row[0].ToString()+" "+row[1].ToString());
                        }
                    }
                }

                if(firstQuery == "Advert")
                {
                    fq = firstQuery;
                    if (secondQuery == "")
                    {
                        queryString = "select advertID, title from advert;";
                        MySqlDataAdapter adapter = new MySqlDataAdapter(queryString, sqlconn);
                        adapter.Fill(resultDataSet, "Item");
                        foreach (DataRow row in resultDataSet.Tables["Item"].Rows)
                        {
                            results.Add(row[0].ToString()+" "+row[1].ToString());
                        }
                    }
                    else
                    {
                        queryString = "select advertID, title from advert where type='"+secondQuery+"';";
                        MySqlDataAdapter adapter = new MySqlDataAdapter(queryString, sqlconn);
                        adapter.Fill(resultDataSet, "Item");
                        foreach (DataRow row in resultDataSet.Tables["Item"].Rows)
                        {
                            results.Add(row[0].ToString()+" "+row[1].ToString());
                        }
                    }
                }

                sqlconn.Close();
            } catch(Exception e)
            {
                Console.Write(e.Message);
            }
            return results;

        }
      
      
        async void listView_ItemTapped(object sender, ItemTappedEventArgs e)
        {

            string tapped = e.Item as string;

            

            if (fq == "Company")
            {
                string[] result = tapped.Split(new char[] { ' ' }, 2);
                await Navigation.PushAsync(new viewCompany(result));
            }
            if (fq == "Advert")
            {
                string[] result = tapped.Split(new char[] { ' ' }, 2);
                await Navigation.PushAsync(new viewAdvert(result));
            }
            if (fq == "Developer")
            {
                string[] result = tapped.Split(new char[] { ' ' }, 3);
                await Navigation.PushAsync(new viewDev(result));
            }

        }
    }

}
