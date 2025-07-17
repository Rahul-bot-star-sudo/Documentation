import java.io.*;
import java.sql.*;
public class DynamicInsertData {
    public static void main(String[] arg){
        try {
            // Load the MySQL JDBC driver
            Class.forName("com.mysql.cj.jdbc.Driver");

            // Create a connection
            String url = "jdbc:mysql://localhost:3306/world";
            String username = "root";
            String password = "Rahul@123";

            Connection con = DriverManager.getConnection(url, username, password);
            // create a query 

            String q = "insert into table1(tName,tCity) values (?,?)";
            
            //get the PreparedStatement object

            PreparedStatement pstmt = con.prepareStatement(q);
 
            BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
            System.out.println("Enter your name : ");
            String name = br.readLine();

            System.out.println("Enter name of city");
            String city = br.readLine();
            

            //set the values to query
            pstmt.setString(1,name);
            pstmt.setString(2,city);

            pstmt.executeUpdate();

            System.out.println("Inserted...");

            con.close();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
