## 🔹 **Step 1: Create Database Connection Class**

### 📄 File: `DBConnection.java`

📁 **Project path:**
`StudentManagementSystem/src/database/DBConnection.java`

👉 इस फ़ाइल में हम MySQL से Java को connect करने का code लिखेंगे।

---

### 🔧 Code (हर लाइन के साथ explanation)

```java
package database;
// 👆 यह line बताती है कि यह class किस package में है — यहां 'database'

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
// 👆 JDBC classes import की जाती हैं ताकि हम database से connect कर सकें

public class DBConnection {
    // 👆 यह public class है जिसका नाम DBConnection है (यह हमारी utility class है)

    public static Connection getConnection() {
        // 👆 यह static method है जो Connection object return करेगा
        Connection conn = null;  // 👉 पहले एक खाली connection बनाएँगे

        try {
            // Step 1: Load JDBC driver class
            Class.forName("com.mysql.cj.jdbc.Driver");
            // 👆 यह line JDBC driver को memory में load करती है (MySQL के लिए)

            // Step 2: Create connection using DriverManager
            conn = DriverManager.getConnection(
                "jdbc:mysql://localhost:3306/student_db",  // 👈 database का URL
                "root",  // 👈 आपका MySQL username (change करें अगर कुछ और है)
                "yourpassword"  // 👈 आपका password (change करें अपने system के अनुसार)
            );

        } catch (ClassNotFoundException | SQLException e) {
            // 👆 अगर driver नहीं मिला या connection में error हुई तो उसे पकड़ें
            e.printStackTrace();  // 👉 error print करें
        }

        return conn;  // 👉 अंत में connection return करें
    }
}
```

---

### 📌 आपको क्या करना है?

1. ✅ NetBeans में `StudentManagementSystem` नाम से Java project बनाओ
2. ✅ उसमें `database` नाम का package बनाओ
3. ✅ उसमें `DBConnection.java` नाम की class बनाओ और ऊपर का code paste करो
4. 🔄 MySQL का username/password और database name अपने हिसाब से change करो


# error's
1. 🔵 ध्यान दो: jdbc:mysql:// के बाद कोई space नहीं होनी चाहिए
2. 🔵 और /// नहीं, सिर्फ //