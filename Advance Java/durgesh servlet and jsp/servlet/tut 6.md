# Creating servlet using implementing servlet
* How to create using javax.servlet.Servlet Interface
  
## Servlet Interface

  1. public abstract void init(javax.servlet.ServletConfig)
  2. public ServletConfig getServletConfig();
  3. public void 
                  service(javax.servlet.ServletRequest,javax.servlet.ServletResponse)
  4. public abstact java.lang.String getServletinfo();
  5. public abstract void destroy
   
1. life cycle method 
2. non-life cycle method   
3. override karana 
```
    class MyServlet impliments Servlet
    {
        // Overrride all methods
    }
```
*Servlet mapping - web.xml // diployment distroctur
 * web pages\web-inf\ new standard deployment descriptor(web.xml)

* create progect Ztest
* Create in source packages com.servlets
* import javax.servlet.*;
* implements life cycle methods

* sevlet declaration 
* creat mapping 