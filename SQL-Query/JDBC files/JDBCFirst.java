// Program for JDBC connection
import java.sql.*;

class JDBCFirst{
    public static void main(String args[]) {
        try {
            // Load the MySQL JDBC driver
            Class.forName("com.mysql.cj.jdbc.Driver");

            // Create a connection
            String url = "jdbc:mysql://localhost:3306/world";
            String username = "root";
            String password = "Rahul@123";

            Connection con = DriverManager.getConnection(url, username, password);

            if (con.isClosed()) {
                System.out.println("Connection is closed.");
            } else {
                System.out.println("Connection established successfully!");
            }

            // Optional: Close the connection
            con.close();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
