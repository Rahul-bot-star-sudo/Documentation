package com.jdbc.practice;

import java.io.*;
import java.sql.*;
import javax.swing.*;  // For JFileChooser and JOptionPane

public class Main {
    public static void main(String[] args) {
        try {
            Connection c = ConnectionProvider.getConnection();  // Assume your custom DB connection class
            
            String q = "INSERT INTO images (pic) VALUES (?)";
            PreparedStatement pstmt = c.prepareStatement(q);
            
            // Open file chooser
            JFileChooser jfc = new JFileChooser();
            jfc.showOpenDialog(null);
            File file = jfc.getSelectedFile();

            // Read file
            FileInputStream fis = new FileInputStream(file);
            pstmt.setBinaryStream(1, fis, fis.available());
            
            pstmt.executeUpdate();

            // Show success popup
            JOptionPane.showMessageDialog(null, "Success!");

            // Close resources
            fis.close();
            pstmt.close();
            c.close();

        } catch (Exception e) {
            e.printStackTrace();
            JOptionPane.showMessageDialog(null, "Error: " + e.getMessage());
        }
    }
}
