import java.sql.*;
import java.util.Scanner;

public class JDBC_CRUD {
    public static void main(String[] args) {
        String url = "jdbc:mysql://localhost:3306/school";
        String user = "root";
        String password = "MyNewPassword123!"; // change this as needed

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection conn = DriverManager.getConnection(url, user, password);
            Statement stmt = conn.createStatement();
            Scanner sc = new Scanner(System.in);

            while (true) {
                System.out.println("\n📘 MENU: 1.Insert 2.Read 3.Update 4.Delete 5.Exit");
                int choice = sc.nextInt();
                sc.nextLine(); // consume newline

                if (choice == 1) {
                    System.out.print("Enter name: ");
                    String name = sc.nextLine();
                    System.out.print("Enter age: ");
                    int age = sc.nextInt();
                    sc.nextLine();
                    System.out.print("Enter grade: ");
                    String grade = sc.nextLine();

                    String insertQuery = "INSERT INTO students (name, age, grade) VALUES ('" + name + "', " + age + ", '" + grade + "')";
                    stmt.executeUpdate(insertQuery);
                    System.out.println("✅ Student inserted!");

                } else if (choice == 2) {
                    ResultSet rs = stmt.executeQuery("SELECT * FROM students");
                    while (rs.next()) {
                        System.out.println(rs.getInt("id") + " | " + rs.getString("name") + " | " + rs.getInt("age") + " | " + rs.getString("grade"));
                    }

                } else if (choice == 3) {
                    System.out.print("Enter ID to update: ");
                    int id = sc.nextInt();
                    sc.nextLine();
                    System.out.print("New name: ");
                    String name = sc.nextLine();

                    String updateQuery = "UPDATE students SET name = '" + name + "' WHERE id = " + id;
                    stmt.executeUpdate(updateQuery);
                    System.out.println("🛠️ Student updated!");

                } else if (choice == 4) {
                    System.out.print("Enter ID to delete: ");
                    int id = sc.nextInt();
                    String deleteQuery = "DELETE FROM students WHERE id = " + id;
                    stmt.executeUpdate(deleteQuery);
                    System.out.println("🗑️ Student deleted!");

                } else {
                    System.out.println("👋 Exiting...");
                    break;
                }
            }

            sc.close();
            conn.close();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
