import java.awt.Image; // ← Ye line zaroori hai
import javax.swing.ImageIcon;
import java.sql.*;
import java.io.InputStream;
import javax.imageio.ImageIO;

public class Helper {
    public static ImageIcon getImageIconById(int id, Connection con){
        ImageIcon icon = null;
        try {
            String q = "SELECT pic FROM images WHERE id = ?";
            PreparedStatement pstmt = con.prepareStatement(q);
            pstmt.setInt(1, id);
            ResultSet set = pstmt.executeQuery();

            if (set.next()) {
                Blob b = set.getBlob("pic");
                InputStream is = b.getBinaryStream();
                Image image = ImageIO.read(is);

                // ⭐ Resize the image (Set your width and height as needed)
                Image scaledImage = image.getScaledInstance(300, 300, Image.SCALE_SMOOTH);

                icon = new ImageIcon(scaledImage);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return icon;
    }
}
