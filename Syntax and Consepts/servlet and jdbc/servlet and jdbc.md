## 📝 Table of Contents

## 📝 Table of Contents
| 🧭 **Servlet Topics**                                                    | 📌 **JDBC Topics**                                                     | 🧭 **Servlet Topics (Extra)**                          | 📌 **JDBC Topics (Extra)**                                              |
| ------------------------------------------------------------------------ | ---------------------------------------------------------------------- | ------------------------------------------------------ | ----------------------------------------------------------------------- |
| [1. Servlet](#1-servlet)                                                 | [1. JDBC](#1-jdbc)                                                     | [11. Filter](#11-filter)                               | [11. Batch Processing](#11-batch-processing)                            |
| [2. Servlet Life Cycle](#2-servlet-life-cycle)                           | [2. JDBC Connection Steps](#2-jdbc-connection-steps)                   | [12. Listener](#12-listener)                           | [12. AutoCommit & Transactions](#12-autocommit--transaction-management) |
| [3. doGet vs doPost](#3-doget-vs-dopost)                                 | [3. Statement vs PreparedStatement](#3-statement-vs-preparedstatement) | [13. Dispatcher](#13-dispatcher)                       | [13. Scrollable ResultSet](#13-scrollableupdatable-resultset)           |
| [4. Session Management](#4-session-management)                           | [4. Connection Pooling](#4-connection-pooling)                         | [14. Annotations](#14-annotations)                     | [14. MetaData](#14-metadata)                                            |
| [5. ServletConfig vs ServletContext](#5-servletconfig-vs-servletcontext) | [5. SQL Injection](#5-sql-injection)                                   | [15. Exception Handling](#15-exception-handling)       | [15. Blob/Clob](#15-blobclob-handling)                                  |
| [6. forward() vs sendRedirect()](#6-forward-vs-sendredirect)             | [6. try-with-resources](#6-try-with-resources)                         | [16. Multipart File Upload](#16-multipart-file-upload) | [16. CallableStatement](#16-callablestatement)                          |
| [7. MVC Pattern](#7-mvc-pattern)                                         | [7. JDBC Interview Questions](#7-jdbc-interview-questions)             | [17. Cookies & Headers](#17-cookies--headers)          | [17. Connection Pool Libraries](#17-connection-pool-library-use)        |

# 1. Servlet 

## Definition (What is the concept?)
A **Servlet** is a Java class used to handle requests and responses in a **web application**. It runs on a **web server** and extends the capabilities of servers by generating dynamic web content (like HTML).
Servlet ek java class hai jo server par chalta hai aur client (browser) se request lekar response bhejta hai. Ye web applications ka backend logic likhne ke liye use hota hai - jaise form data process karna, dynamic content generate karna ya database se data fetch karna.

## Use (Kab aur kyu use hota hai)
Servlet tab use hota hai jab hume client (web browser) se data lena ya bhejana ho, ya dynamic web pages banana ho. Form submission handle karni ho ya backend me kuch processing karni ho toh servlet ideal hai.

## Code Example(Chhota aur clean)
```java
@WebServlet("/hello")
public class HelloServlet extends HttpServlet {
    protected void doGet(HttpServletRequest req, HttpServletResponse res)
        throws ServletException, IOException{
            res.setContentType("text/html");
            PrintWriter out = res.getWriter();
            out.println("Hello, Servlet");
            out.close();
        }
}
```

## Real life analogy (Samajhne me esy ho)
Servlet ek waiter ki tarah kaam karta hai restaurant me customet order deta hai waiter kitchen (server) tak order pahuchata hai aur wapas khana (response) lekar customer ko deta hai.

## Interview Point (Common Questions ya confusion)
## Servlet life cycle: What happens in init(), service(),destroy()?

### Servlet life cycle

## Difference beetween GET and POST request
## How to manage session in servlet
## Exception handling in servlets
## forward() vs sendRedirect()
## ServletContext vs ServletConfig
## Session management: Cookies, URL Rewriting, HttpSession, hidden form fields
## doGet() vs doPost() difference 
  
# 1. JDBC
## Definition(Concept kya hai)
JDBC(Java database connectivity) ek java api hai jo java application ko database se connect karne, query run karne aur rsult receive karne ki facility deta hai.

## Use (Kab aur kyu use hota hai)
Jab java application ko kisi bhi RDBMS (like MySQL,Oracle,etc.) ke sath connect karna ho ya database se data insert,update,delete ya fetch karna ho, tab JDBC use hota hai

## Code Example (chota aur clean)
```java
// database connection
Connection con = DriverManager.getConnection(
    "jdbc:mysql://localhost:3306/dbname","user","password"
);
// query execution
Statement stmt = con.createStatement();
ResultSet rs = stmt.executeQuery("Select * From users");

while(rs.next()){
    System.out.println(rs.getString("username"));
}
// resource cleanup
rs.close();
stmt.close();
con.close();

```
## Real life analogy (Samajhne me easy ho)
JDBC bilkul telephone line ki tarah hai:jaise phone line se hum kisi se bat kar sakate hai waise hi jdbc se hum java aur database ke beech bat cheet(communication) karate hai.

## Interview point (Common questions ya confusion)
## Difference between statement and preparedstatement
* 
## What is Connection Pooling?
## How to handle sql injection
## try-with-resources is JDBC
## Sql injection kya hai kaise rokoge?
## Connection Pooling kya hai?
## JDBC connection steps.
* 

## Important Points
##. Load driver (auto in latest java)
##. Connection ceate karo
##. Statement banao
##. Query execute karo
##. Result process karo
##. Resources close karo

# Servlet-Extra Interview Points
## Filter: Request/response ko process karne se pahle ya bad modify kar sakte hain(e.g, authentication, logging).
## Listener: Events monitor karne ke liye (session create/destroy,attribute change, context lifecycle).
## Exception Handling: web.xml ya @WebServlet annotation me error-page mapping.
## Multipart/form-data Handling: File upload servlet se kaise hota hai (use Apache Commons FileUpload ya Servlet 3+.getPart()).
## Tread Safety: Servlet shared hote hain, variables synchronize ya thread-local banana padta hai.
## Dispatcher: RequestDispatcher—forward() (server-side transfer), include() (content embed karna).
## Annotations: @WebServlet, @WebFilter, @WebListener—modern config sirf code se possible.
## Cookies/Headers Management: Custom header/cookie set/get karna.

# JDBC-Extra Interview Points

Batch Processing: Multiple queries ek hi time par * bhejna (stmt.addBatch(), stmt.executeBatch())—performance improve karne ke liye.

## AutoCommit & Transaction Management: con.setAutoCommit(false), con.commit(), con.rollback()—atomic operations ke liye.

## Scrollable/Updatable ResultSet: ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE—records back/forth padhna/edit karna.

## MetaData: DatabaseMetaData, ResultSetMetaData—table, column info dynamically lena.

## Blob/Clob Handling: Images, files ya large text database me store/fetch karna (rs.getBlob, rs.getClob).

## CallableStatement: Stored procedures call karna (CallableStatement cs = con.prepareCall()).

## Connection Pool Library Use: (e.g., HikariCP, Apache DBCP)—production me fast, reusable connections.
Theek hai Rahul 👍
Main tumhare diye numbering ke hisaab se **poora Servlet + JDBC detailed handbook** bana deta hoon — har topic ke liye:

* **Definition** (simple language)
* **Use case**
* **Code example**
* **Real-life analogy**
* **Important Interview Points**

Main tumhe **Markdown format** me dunga taaki tum ise easily Eclipse notes, PDF, ya GitHub README me use kar sako.

---

## **1. Servlet**

**Definition:**
Servlet ek Java class hai jo server par run hoti hai aur client (browser) ke HTTP request ka response generate karti hai.

**Use Case:**

* Form data process karna
* Database se data lena aur client ko bhejna
* Dynamic HTML/JSON content generate karna

**Code Example:**

```java
@WebServlet("/hello")
public class HelloServlet extends HttpServlet {
    protected void doGet(HttpServletRequest req, HttpServletResponse res)
        throws ServletException, IOException {
        res.setContentType("text/html");
        PrintWriter out = res.getWriter();
        out.println("<h1>Hello, Servlet!</h1>");
        out.close();
    }
}
```

**Real-life Analogy:**
Waiter jo customer ka order leke kitchen me bhejta hai aur wapas food laata hai.

**Interview Points:**

* Servlet life cycle
* doGet vs doPost
* forward() vs sendRedirect()

---

## **2. Servlet Life Cycle**

**Phases:**

1. **init()** → Servlet load hone par ek baar call hota hai.
2. **service()** → Har request par call hota hai, request method ke hisaab se doGet/doPost call karta hai.
3. **destroy()** → Server band hone par call hota hai.

**Code Example:**

```java
public class LifeCycleServlet extends HttpServlet {
    public void init() {
        System.out.println("Servlet initialized");
    }
    public void service(HttpServletRequest req, HttpServletResponse res)
        throws IOException {
        res.getWriter().println("Request served");
    }
    public void destroy() {
        System.out.println("Servlet destroyed");
    }
}
```

**Interview Tip:**

* init() ek baar, service() multiple times, destroy() ek baar call hota hai.

---

## **3. Difference Between GET and POST Request**

| Feature     | GET          | POST            |
| ----------- | ------------ | --------------- |
| Data in URL | Yes          | No              |
| Max length  | \~2048 chars | No strict limit |
| Security    | Less secure  | More secure     |
| Use case    | Fetch data   | Submit data     |

---

## **4. How to Manage Session in Servlet**

**Techniques:**

* **Cookies**
* **URL Rewriting**
* **HttpSession**
* **Hidden Form Fields**

**Example:**

```java
HttpSession session = request.getSession();
session.setAttribute("username", "Rahul");
```

---

## **5. Exception Handling in Servlets**

**Ways:**

* try-catch in code
* `error-page` in `web.xml`
* `@WebServlet` with `@WebInitParam` and error mapping

---

## **6. forward() vs sendRedirect()**

| Feature     | forward()           | sendRedirect() |
| ----------- | ------------------- | -------------- |
| Type        | Server-side         | Client-side    |
| URL change  | No                  | Yes            |
| Performance | Faster              | Slower         |
| Use case    | Internal navigation | External link  |

---

## **7. ServletContext vs ServletConfig**

| Feature | ServletContext        | ServletConfig             |
| ------- | --------------------- | ------------------------- |
| Scope   | Application-wide      | Per servlet               |
| Access  | `getServletContext()` | `getServletConfig()`      |
| Use     | Common settings       | Servlet-specific settings |

---

## **8. Session Management Methods**

* **Cookies**
* **URL Rewriting**
* **HttpSession**
* **Hidden Fields**

---

## **9. doGet() vs doPost()**

* doGet() → URL parameters, for fetching data
* doPost() → Body parameters, for submitting data

---

## **10. JDBC**

**Definition:**
Java API to connect and interact with databases.

**Code Example:**

```java
Connection con = DriverManager.getConnection(
    "jdbc:mysql://localhost:3306/dbname","user","password");
Statement stmt = con.createStatement();
ResultSet rs = stmt.executeQuery("SELECT * FROM users");
```

---

## **11. Difference Between Statement and PreparedStatement**

| Feature            | Statement      | PreparedStatement |
| ------------------ | -------------- | ----------------- |
| SQL Injection safe | No             | Yes               |
| Performance        | Slower         | Faster            |
| Use                | Simple queries | Repeated queries  |

---

## **12. Connection Pooling**

Reusing DB connections for performance.
Example: HikariCP, Apache DBCP.

---

## **13. SQL Injection & Prevention**

**Bad:**

```java
"SELECT * FROM users WHERE name='" + name + "'"
```

**Good:**

```java
PreparedStatement ps = con.prepareStatement(
 "SELECT * FROM users WHERE name=?");
ps.setString(1, name);
```

---

## **14. try-with-resources in JDBC**

Auto-closes connections:

```java
try(Connection con = DriverManager.getConnection(...)) {
    // work
}
```

---

## **15. JDBC Connection Steps**

1. Load Driver (auto in latest Java)
2. Get Connection
3. Create Statement
4. Execute Query
5. Process Result
6. Close resources

---

## **16. Filter**

Modify request/response before reaching servlet.
Use for logging, authentication.

---

## **17. Listener**

Listens to events like session creation/destruction.

---

## **18. Exception Handling in Servlet (Advanced)**

Use `error-page` in web.xml.

---

## **19. Multipart/Form-Data Handling**

File upload handling using Servlet 3.0+ `.getPart()`.

---

## **20. Thread Safety in Servlet**

Avoid instance variables or use synchronization.

---

## **21. Dispatcher (forward & include)**

Forward request internally or include another resource’s output.

---

## **22. Servlet Annotations**

* `@WebServlet`
* `@WebFilter`
* `@WebListener`

---

## **23. Cookies & Headers Management**

Set and read cookies, set HTTP headers.

---

## **24. Batch Processing**

```java
stmt.addBatch("INSERT ...");
stmt.executeBatch();
```

---

## **25. AutoCommit & Transaction Management**

```java
con.setAutoCommit(false);
con.commit();
```

---

## **26. Scrollable & Updatable ResultSet**

Move forward/back and update data in ResultSet.

---

## **27. MetaData in JDBC**

* `DatabaseMetaData`
* `ResultSetMetaData`

---

## **28. Blob & Clob Handling**

Store/retrieve large binary/text data.

---

## **29. CallableStatement**

Execute stored procedures.

---

## **30. Connection Pool Library Use**

Use HikariCP, Apache DBCP for performance.

---

Rahul, agar tum chaho to main **is markdown ko style ke saath table of contents linked version** bana du, taaki tum click karke har topic par ja sako.
Kya tum chahte ho main ab iska clickable TOC bana du?
