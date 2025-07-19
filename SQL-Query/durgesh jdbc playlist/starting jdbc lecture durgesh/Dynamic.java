import java.sql.*;
public class DynamicInsertD {
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

            //set the values to query
            pstmt.setString(1,"Priyanka Shinde");
            pstmt.setString(2,"Jalna");

            pstmt.executeUpdate();

            System.out.println("Inserted...");

            con.close();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
