
## ✅ Part 1: What is Array Iteration?

**Array Iteration** means going through **each element** of the array **one by one**, usually with a `for`, `while`, or `for-each` loop.

---

## ✅ Part 2: Iterating a 1D Array

```java
int[] numbers = {10, 20, 30, 40, 50};
```

### 🔹 Using a `for` loop:

```java
for (int i = 0; i < numbers.length; i++) {
    System.out.println(numbers[i]);
}
```

### 🔹 Using a `for-each` loop:

```java
for (int num : numbers) {
    System.out.println(num);
}
```

> 🔁 `for-each` is great when you **don’t need the index**, just the value.

---

## ✅ Part 3: Iterating a 2D Array

```java
int[][] matrix = {
    {1, 2, 3},
    {4, 5, 6}
};
```

### 🔹 Using nested `for` loop:

```java
for (int i = 0; i < matrix.length; i++) {
    for (int j = 0; j < matrix[i].length; j++) {
        System.out.print(matrix[i][j] + " ");
    }
    System.out.println(); // for new row
}
```

### 🔹 Using nested `for-each` loop:

```java
for (int[] row : matrix) {
    for (int value : row) {
        System.out.print(value + " ");
    }
    System.out.println();
}
```

---

## 🧠 Real-Life Analogy

* Iterating a 1D array = reading a list line by line
* Iterating a 2D array = scanning a spreadsheet row by row

---

## 📝 Practice Questions

### Q1: What will this print?

```java
String[] fruits = {"Apple", "Banana", "Mango"};

for (String fruit : fruits) {
    System.out.println(fruit);
}
```

### Q2: Write a program to print the **sum** of elements in an `int[]` array using a loop.

### Q3: Iterate this matrix using both methods:

```java
int[][] grid = {
    {1, 0, 1},
    {0, 1, 0}
};
```

---

## ✅ Summary Table

| Loop Type       | Use When You…                     |
| --------------- | --------------------------------- |
| `for` loop      | Need index or partial traversal   |
| `for-each` loop | Just want values (simpler syntax) |

---