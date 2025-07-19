

## 🔹 **1. `Main.java`** – Main Program

Ye program user se ek image file choose karwata hai aur us image ko **MySQL database me save karta hai**.

### 📄 Code Summary:

```java
package com.jdbc.practice;

import java.io.*;
import java.sql.*;
import javax.swing.*;  // For JFileChooser and JOptionPane

public class Main {
    public static void main(String[] args) {
        try {
            Connection c = ConnectionProvider.getConnection();  // DB connection
            
            String q = "INSERT INTO images (pic) VALUES (?)";
            PreparedStatement pstmt = c.prepareStatement(q);
            
            // File chooser open karo
            JFileChooser jfc = new JFileChooser();
            jfc.showOpenDialog(null);
            File file = jfc.getSelectedFile();

            // File ko read karo
            FileInputStream fis = new FileInputStream(file);
            pstmt.setBinaryStream(1, fis, fis.available());

            pstmt.executeUpdate();  // DB me image save karo

            // Success message dikhaye
            JOptionPane.showMessageDialog(null, "Success!");

            // Close all things
            fis.close();
            pstmt.close();
            c.close();

        } catch (Exception e) {
            e.printStackTrace();
            JOptionPane.showMessageDialog(null, "Error: " + e.getMessage());
        }
    }
}
```

### 🧠 Simple Explanation:

| Step | Kya Kiya Gaya                                                       |
| ---- | ------------------------------------------------------------------- |
| 1️⃣  | `ConnectionProvider.getConnection()` se database ka connection liya |
| 2️⃣  | SQL query `"INSERT INTO images (pic) VALUES (?)"` likhi             |
| 3️⃣  | JFileChooser se image file select karwai                            |
| 4️⃣  | File read karke SQL query me image file bheji                       |
| 5️⃣  | Image database me save hui                                          |
| 6️⃣  | `Success!` pop-up message dikhaya                                   |
| 7️⃣  | Sab files close ki gayi (clean-up)                                  |

---

## 🔹 **2. `ConnectionProvider.java`** – DB Connection Helper

Ye ek helper class hai jo MySQL se connection banane ka kaam karti hai.

### 📄 Code Summary:

```java
package com.jdbc.practice;

import java.sql.*;

public class ConnectionProvider {
    public static Connection getConnection() {
        Connection con = null;
        try {
            Class.forName("com.mysql.cj.jdbc.Driver"); // Driver load karo
            con = DriverManager.getConnection(
                "jdbc:mysql://localhost:3306/your_db_name", "root", "Rahul@123"
            ); // DB se connect karo
        } catch (Exception e) {
            e.printStackTrace(); // agar error aaye to dikhao
        }
        return con; // connection return karo
    }
}
```

### 🧠 Simple Explanation:

| Step | Kya Karta Hai                                                 |
| ---- | ------------------------------------------------------------- |
| 1️⃣  | JDBC driver load karta hai (MySQL se connect hone ke liye)    |
| 2️⃣  | Database address, username, password se connection banata hai |
| 3️⃣  | Agar connection bana, to `Main.java` ko wapas de deta hai     |
| 4️⃣  | Agar error aaya to `e.printStackTrace()` se dikha deta hai    |

---

## 🧩 Overall Flow Diagram:

```
             +---------------------+
             |     Main.java       |
             +---------------------+
                       |
              Calls getConnection()
                       ↓
             +----------------------+
             | ConnectionProvider   |
             +----------------------+
             | Return MySQL Connection
                       ↓
          Image file selected by JFileChooser
                       ↓
          File inserted into DB using PreparedStatement
                       ↓
              Show "Success!" message
```

---

## ✅ Aapne kya sikh liya:

* ✅ JDBC connection banana
* ✅ GUI se file choose karna (`JFileChooser`)
* ✅ Image ko DB me store karna (`setBinaryStream`)
* ✅ Exception handling & resource closing

