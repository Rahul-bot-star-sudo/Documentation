package com.student.servlet;

import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.student.util.DBUtil;

public class SignServlet extends HttpServlet {

    // HTTP POST method: Angular form se data aata hai, ye method call hota hai
    protected void doPost(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {

        // ✅ CORS Headers lagana zaroori hai taaki Angular (localhost:4200) request kar sake
        res.setHeader("Access-Control-Allow-Origin", "http://localhost:4200");
        res.setHeader("Access-Control-Allow-Methods", "POST, GET, OPTIONS, PUT, DELETE");
        res.setHeader("Access-Control-Allow-Headers", "Content-Type");

        // ✅ Angular ke form se aaya hua data retrieve karte hain
        String username = req.getParameter("username");
        String email = req.getParameter("email");
        String password = req.getParameter("password");

        try (Connection conn = DBUtil.getConnection()) {
            // ✅ User ko database me insert karne ke liye SQL query likhi
            String sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

            PreparedStatement stmt = conn.prepareStatement(sql);
            stmt.setString(1, username);  // form data ko SQL me set kiya
            stmt.setString(2, email);
            stmt.setString(3, password);

            stmt.executeUpdate(); // ✅ SQL run ki

            // ✅ Angular ko response JSON me bhejna
            res.setContentType("application/json");
            res.getWriter().write("{\"status\":\"success\"}");

        } catch (Exception e) {
            e.printStackTrace(); // error debug ke liye
            res.setContentType("application/json");
            res.getWriter().write("{\"status\":\"error\"}");
        }
    }

    // ✅ Pre-flight CORS requests handle karne ke liye OPTIONS method bhi likhna chahiye
    protected void doOptions(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
        res.setHeader("Access-Control-Allow-Origin", "http://localhost:4200");
        res.setHeader("Access-Control-Allow-Methods", "POST, GET, OPTIONS, PUT, DELETE");
        res.setHeader("Access-Control-Allow-Headers", "Content-Type");
        res.setStatus(HttpServletResponse.SC_OK);
    }
}
