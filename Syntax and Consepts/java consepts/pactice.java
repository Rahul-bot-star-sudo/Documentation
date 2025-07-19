import java.sql.Connection;
import java.sql.DriverManager;

public class pactice {
    // yaha mai apana java code ka practice karunga.
    public static void main(String[] args) {
        Connection con = null;
        try {
            Class.forName("com.mysql.jdbc.Driver");
            con = DriverManager.getConnection("jdbc:mysql://localhost:3306/world","root" , "Rahul@123");
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
