## 📝 Table of Contents

## 📝 Table of Contents

| 🧭 **Servlet Topics** | 📌 **JDBC Topics** |
|----------------------|-------------------|
| [1. Servlet](#1-servlet) | [2. JDBC](#2-jdbc) |
| [Definition](#definition-what-is-the-concept) | [Definition](#definitionconcept-kya-hai) |
| [Use](#use-kab-aur-kyu-use-hota-hai) | [Use](#use-kab-aur-kyu-use-hota-hai-1) |
| [Code Example](#code-examplechhota-aur-clean) | [Code Example](#code-example-chota-aur-clean) |
| [Analogy](#real-life-analogy-samajhne-me-esy-ho) | [Analogy](#real-life-analogy-samajhne-me-easy-ho) |
| [Interview Qs](#interview-point-common-questions-ya-confusion) | [Interview Qs](#interview-point-common-questions-ya-confusion-1) |
| [Servlet Life Cycle](#servlet-life-cycle-init-servicedestroy-methods) | [JDBC Steps](#jdbc-connection-steps) |
| [GET vs POST](#difference-beetween-get-and-post-request) | [Statement vs PreparedStatement](#difference-between-statement-and-preparedstatement) |
| [Session Management](#how-to-manage-session-in-servlet) | [Connection Pooling](#connection-pooling-kya-hai) |
| [Exception Handling](#exception-handling-in-servlets) | [SQL Injection](#sql-injection-kya-hai-kaise-rokoge) |
| [forward vs sendRedirect](#forward-vs-sendredirect) | [AutoCommit & Transaction](#autocommit--transaction-management-consetautocommitfalse-concommit-conrollbackatomic-operations-ke-liye) |
| [ServletContext vs Config](#servletcontext-vs-servletconfig) | [Batch Processing](#batch-processing-multiple-queries-ek-hi-time-par--bhejna-stmtaddbatch-stmtexecutebatchperformance-improve-karne-ke-liye) |
| [doGet vs doPost](#doget-vs-dopost-difference) | [Blob/Clob](#blobclob-handling-images-files-ya-large-text-database-me-storefetch-karna-rsgetblob-rsgetclob) |
| [Filter](#filter-requestresponse-ko-process-karne-se-pahle-ya-bad-modify-kar-sakte-haineg-authentication-logging) | [CallableStatement](#callablestatement-stored-procedures-call-karna-callablestatement-cs--conpreparecall) |
| [Listener](#listener-events-monitor-karne-ke-liye-session-createdestroyattribute-change-context-lifecycle) | [Metadata](#metadata-databasemetadata-resultsetmetadata-table-column-info-dynamically-lena) |
| [Annotations](#annotations-webservlet-webfilter-weblister-modern-config-sirf-code-se-possible) | [Scrollable/Updatable ResultSet](#scrollableupdatable-resultset-resultsettype_scroll_insensitive-resultsetconcur_updatablerecords-backforth-padnaedit-karna) |
| [Cookies/Headers](#cookiesheaders-management-custom-headercookie-setget-karna) | [Connection Pool Libraries](#connection-pool-library-use-eg-hikaricp-apache-dbcpproduction-me-fast-reusable-connections) |

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
## Servlet life cycle (init, service,destroy methods)
## Difference beetween GET and POST request
## How to manage session in servlet
## Exception handling in servlets
## forward() vs sendRedirect()
## ServletContext vs ServletConfig
## Session management: Cookies, URL Rewriting, HttpSession, hidden form fields
## doGet() vs doPost() difference 
  
# 2. JDBC
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