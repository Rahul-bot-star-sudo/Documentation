import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

public class practicequery {
    public static void main(String[] args) {
        String url = "jdbc:mysql://localhost:3306/school";
        String username = "root";
        String password = "MyNewPassword123!"; // aapka actual MySQL password

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection conn = DriverManager.getConnection(url, username, password);
            Statement stmt = conn.createStatement();

            // Q1: Show only student names
            System.out.println("📘 All Student Names:");
            ResultSet rs1 = stmt.executeQuery("SELECT name FROM students");
            while (rs1.next()) {
                System.out.println("Name: " + rs1.getString("name"));
            }

            // Q2: Students with grade 'A'
            System.out.println("\n🎯 Students with Grade A:");
            ResultSet rs2 = stmt.executeQuery("SELECT * FROM students WHERE grade = 'A'");
            while (rs2.next()) {
                System.out.println(rs2.getInt("id") + " - " + rs2.getString("name"));
            }

            // Q3: Students older than 18
            System.out.println("\n📗 Students older than 18:");
            ResultSet rs3 = stmt.executeQuery("SELECT * FROM students WHERE age > 18");
            while (rs3.next()) {
                System.out.println(rs3.getInt("id") + " - " + rs3.getString("name") + " - Age: " + rs3.getInt("age"));
            }

            rs1.close();
            rs2.close();
            rs3.close();
            stmt.close();
            conn.close();

        } catch (Exception e) {
            System.out.println("❌ Error: " + e.getMessage());
            e.printStackTrace();
        }
    }


}
