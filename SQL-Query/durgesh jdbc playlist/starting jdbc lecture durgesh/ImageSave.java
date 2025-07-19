import java.io.*;
import java.sql.*;

public class ImageSave {
    public static void main(String[] args) {
        try{

            //Class.forName("com.mysql.jdbc.Driver");
            Class.forName("com.mysql.cj.jdbc.Driver");

            //Connection con = DriverManager.getConnection("jdbc:mysql://loclahost:3306/world","root","Rahul@123");
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/world", "root", "Rahul@123");

            String q = "insert into images(pic) values(?)";
            PreparedStatement pstmt = con.prepareStatement(q);
           // FileInpputStream fis = new FileInputStream(\"C:\\Users\\rahul\\OneDrive\\Desktop\\Netflix\\assets\\img\\bg.jpg\");
           FileInputStream fis = new FileInputStream("C:\\Users\\rahul\\OneDrive\\Desktop\\Netflix\\assets\\img\\bg.jpg");
 
           pstmt.setBinaryStream(1,fis,fis.available());
            pstmt. executeUpdate();
            System.out.println("done...");
        }
        
        catch (Exception e) {
    System.out.println("Error: " + e.getMessage());
}

    }
}
