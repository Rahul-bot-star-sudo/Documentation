package com.student.servlet;

import com.student.util.DBUtil;
import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class SignServlet extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {

        // CORS headers yahan likhein
        res.setHeader("Access-Control-Allow-Origin", "*");
        res.setHeader("Access-Control-Allow-Methods", "POST, GET, OPTIONS");
        res.setHeader("Access-Control-Allow-Headers", "Content-Type");

        String username = req.getParameter("username");
        String email = req.getParameter("email");
        String password = req.getParameter("password");

        System.out.println("Received data: " + username + ", " + email); // DEBUG

        try (Connection conn = DBUtil.getConnection()) {
            System.out.println("✅ Database connection successful"); // DEBUG
            String sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            PreparedStatement stmt = conn.prepareStatement(sql);
            stmt.setString(1, username);
            stmt.setString(2, email);
            stmt.setString(3, password);
            int rowsInserted = stmt.executeUpdate();
            if (rowsInserted > 0) {
                System.out.println("✅ Data inserted successfully.");
                res.setContentType("application/json");
                res.getWriter().write("{\"status\": \"success\"}");
            } else {
                res.setContentType("application/json");
                res.getWriter().write("{\"status\": \"fail\"}");
            }
        } catch (Exception e) {
            System.err.println("Exception occurred: " + e.getMessage());
            res.setContentType("application/json");
            res.getWriter().write("{\"status\": \"error\"}");
        }
    }
}
