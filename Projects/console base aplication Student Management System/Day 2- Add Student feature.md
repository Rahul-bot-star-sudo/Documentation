# What You're Learning Today - Day Concepts
Great! let's begin **Day 2: Add Student feature**
We'll now create a `Student` class and allow the user to **add students** and **store the in memory** using an `ArrayList`.

### Files Today 
* `Student.java` (new)
* Update `StudentManagement.java`

### 1.What is a `Class` in Java?
A `class` is like a **blueprint.**
It tells java how to create objects with some **properties (data)** and **actions (methods).**
Example:
you want to create many students.
Each student has:
* A name 
* A roll number 
   So we create a `Student` class.
```java
public class Student {
    String name;
    int roll;

    public Student(String name, int roll) {
        this.name = name;
        this.roll = roll;
    }

    public void display() {
        System.out.println("Name: " + name + ", Roll No: " + roll);
    }
}
```

### ✅ What’s Happening:

* `String name; int roll;` → student has a name and roll number
* `Student(String name, int roll)` → this is a **constructor** (used when creating new student)
* `display()` → a function that prints student’s details

---

### 🔹 2. What is an `ArrayList<Student>`?

* `ArrayList` is like a **flexible box** where you can store many students.
* Unlike arrays, you can **keep adding items** without setting a fixed size.

Example:

```java
ArrayList<Student> students = new ArrayList<>();
```

Then you can add a student like:

```java
students.add(new Student("Amit", 101));
```

You can print all students like:

```java
for (Student s : students) {
    s.display();
}
```

---

### 🔹 3. How Input Works Here

We use `Scanner` again:

```java
Scanner sc = new Scanner(System.in);
```

📌 Important:
After using `sc.nextInt()`, you must use `sc.nextLine();` to **consume the newline**.
Otherwise, the next input might get skipped.

---

### 🔹 4. Summary of the Flow

1. User sees menu
2. If they press 1 → we **ask for name and roll** → create a `Student` → add to list
3. If they press 2 → we **show the list** using `display()`
4. If they press 3 → exit
5. Otherwise → show invalid input

---

## 🔁 Final Picture:

```
Student.java       → stores one student’s name and roll
ArrayList<Student> → stores many students
Menu system        → helps user add/view/exit
```
