### 1. `main()` Method 


```java
public static void main(String[] args)

```

### this is **where your program starts**.
- `public` = anyone can run this method
- `static` = run without creating an object
- `void` = it returns nothing
- `String[] args` = it can take input from the command line (not used for now)

### **think of it as the entry door** to your program.
```java
System.out.println(Welcome to the program!);
```
this **prints text to the screen.**
* `System` = built-in Java class
* `out` = standard output (console)
* `println()` = prints massage and moves to the next line

it's like your program is **talking to the user.**

### 3. `Scanner` Class
```java
Scanner sc = new Scanner(System.in);
```
this **takes input from the user.**
* `Scanner` = a tool to read user input 
* `System.in` = reads from keyboard
Example:
```java
int choice = sc.nextInt();
```
think of scanner like **a microphone** -- user speaks (types),program listens.
### 4. `switch-case`
```java
switch (choice) {
case 1:
	// do something
	break;
case 2:
	// do something else
	break:
default:
	System.out.println("Invalid choice");
}
```
this helps you **make decisions** based on user input.
* `switch` checks what value is in `choice`
* Each `case` is a possible value 
* `break` stops after one case
* `default` runs if no match found

It's like a **menu button** -- press 1, it does A. Press 2, it does B.

### 5. Project Structure (Big Picture)
for now, you are writing everything in one file -- that's good for learning.
Later, we will split the code like this:
```pgsql
StudentManagement.java -> main file
Student.java -> student details
StudentService.java -> functions like add/view
```
this helps your code stay **clean and organized**

