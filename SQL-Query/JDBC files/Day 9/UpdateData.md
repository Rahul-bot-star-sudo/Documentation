यह Java प्रोग्राम एक JDBC (Java Database Connectivity) प्रोग्राम है जो किसी database की एक row को update करता है। नीचे मैं इसे पूरी तरह से step-by-step समझाता हूँ और इसमें जो concepts use हुए हैं, उन्हें भी explain करता हूँ।

---

## ✅ **Program का उद्देश्य**:

User से **नाम**, **शहर** और **ID** input लेना और उसके आधार पर database में `table1` की उस row को update करना जिसकी `tId` दी गई हो।

---

## 🧩 **Step-by-Step Explanation:**

### 1. **Package Declaration & Imports**

```java
package com.jdbc.practice;
import java.sql.Connection;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.sql.PreparedStatement;
```

#### 👉 Concepts:

* `package`: Code को organize करने के लिए use होता है।
* `BufferedReader` + `InputStreamReader`: User से input लेने के लिए।
* `java.sql.*`: JDBC classes जैसे `Connection` और `PreparedStatement` के लिए।

---

### 2. **Class Declaration**

```java
public class UpdateJDBC {
```

यह एक simple Java class है जिसमें `main()` method है। Execution यहीं से शुरू होता है।

---

### 3. **Getting Database Connection**

```java
Connection con = ConnectionProvider.getConnection();
```

#### 👉 Concept:

* `ConnectionProvider` एक custom class है (आपने शायद अलग से बनाई होगी) जो database से connection provide करती है।
* `Connection` interface JDBC का हिस्सा है जो database से connect करता है।

---

### 4. **SQL Query Preparation**

```java
String q = "update table1 set tName=? , tCity=? where tId=?";
```

#### 👉 Concept:

* यह SQL **update** query है।
* इसमें **?** placeholders हैं — यह **PreparedStatement** में values dynamically set करने के लिए होते हैं।
* इससे **SQL Injection** से बचा जा सकता है।

---

### 5. **User Input लेना**

```java
BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
String name = br.readLine();
String city = br.readLine();
int id = Integer.parseInt(br.readLine());
```

#### 👉 Concepts:

* `BufferedReader` और `InputStreamReader`: Console से input लेने के लिए।
* `Integer.parseInt()`: String को integer में convert करता है।

---

### 6. **PreparedStatement में Values Set करना**

```java
PreparedStatement pstmt = con.prepareStatement(q);
pstmt.setString(1 , name);
pstmt.setString(2 , city);
pstmt.setInt(3 , id);
```

#### 👉 Concept:

* `PreparedStatement`: SQL query को pre-compile करता है और parameters dynamically set करता है।
* `setString()` / `setInt()`: Placeholders (`?`) में values भरने के लिए।

---

### 7. **Query Execute करना**

```java
int rowsAffected = pstmt.executeUpdate();
```

#### 👉 Concept:

* `executeUpdate()` method query को run करता है और return करता है कि कितनी rows update हुई हैं।

---

### 8. **Output देना और Connection बंद करना**

```java
System.out.println("done... " + rowsAffected + " row(s) updated.");
pstmt.close();
con.close();
```

#### 👉 Concept:

* Resource leak से बचने के लिए connection और statement को close करना जरूरी होता है।

---

## 🧠 **Used Concepts Summary**:

| Concept                  | Description                                                |
| ------------------------ | ---------------------------------------------------------- |
| JDBC                     | Java से SQL database connect और interact करने के लिए API   |
| Connection               | Database से connection create करता है                      |
| PreparedStatement        | Query को dynamic parameters के साथ run करने देता है        |
| BufferedReader           | Console से input लेने का efficient तरीका                   |
| InputStreamReader        | System.in को character stream में बदलता है                 |
| SQL Injection Prevention | PreparedStatement का use करके injection से बचाव होता है    |
| Exception Handling       | `try-catch` block से runtime errors को handle किया जाता है |

---

## 🧪 Example Input & Output

**Input:**

```
Enter new name: Rahul Sharma
Enter your city name: Pune
Enter the student id: 3
```

**Output:**

```
done... 1 row(s) updated.
```

---

अगर आप चाहें तो मैं `ConnectionProvider` class भी बना कर दे सकता हूँ जिससे यह पूरा JDBC प्रोग्राम run हो सके।

क्या आप चाहेंगे कि मैं `ConnectionProvider.java` class का code भी दे दूं?
