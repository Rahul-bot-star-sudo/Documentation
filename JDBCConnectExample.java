import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

public class JDBCConnectExample {
    public static void main(String[] args) {
        String url = "jdbc:mysql://localhost:3306/testdb"; // testdb = database ka naam
        String username = "root";
        String password = "MyNewPassword123!"; // yahi password use karo

        try {
            // Step 1: Driver class loading (optional for MySQL 8+)
            Class.forName("com.mysql.cj.jdbc.Driver");

            // Step 2: Connect to database
            Connection conn = DriverManager.getConnection(url, username, password);
            System.out.println("✅ Connected to database!");

            // Step 3: Query execute
            Statement stmt = conn.createStatement();
            ResultSet rs = stmt.executeQuery("SELECT * FROM your_table_name");

            // Step 4: Data print
            while (rs.next()) {
                System.out.println("ID: " + rs.getInt("id") +
                                   ", Name: " + rs.getString("name"));
            }

            // Step 5: Close
            rs.close();
            stmt.close();
            conn.close();
        } catch (Exception e) {
            System.out.println("❌ Error: " + e.getMessage());
            e.printStackTrace();
        }
    }
}
