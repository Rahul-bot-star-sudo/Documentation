
  ﻿# MongoDB-Query

aaj mainne mongd download kiya 
fir mongo shell download kiya 
maine net stop mongoDB command dekhi 
maine net start mongoDB command dekhi 

fir dekha ki sham mongo db ki query kaha run kar sakate hai mongodb://localhost:27017
usame pahali query chalayi show dbs 
use latest_db
>db.students.insertOne({name:"ram",age:12})
>db.students.find()
>db.students.updateOne({name:"motu"},{$set:{idCards:{hasPanCard:true,hasAdharCard:true}}})
>db.students.updateMany{$set:{hobbies: ['anime','cooking']}}
>db.students.find({idCards.hasPanCards':true})
>db.students.findOne({idCards.hasPanCards':true})
Yahan ek basic **`README.md`** file hai jisme MongoDB install karne se lekar basic queries tak sab likha gaya hai. Aap isse apne project ke folder me `README.md` naam se save kar sakte ho:

---

````markdown
# 📦 MongoDB Setup and Basic Queries

## ✅ Step 1: Install MongoDB
1. Download MongoDB from: [https://www.mongodb.com/try/download/community](https://www.mongodb.com/try/download/community)
2. Install MongoDB and choose to install **MongoDB Shell** (mongosh).
3. MongoDB service should start automatically. If needed, you can start/stop manually:

```bash
# Stop MongoDB service
net stop MongoDB

# Start MongoDB service
net start MongoDB
````

---

## ✅ Step 2: Start Mongo Shell

Open Command Prompt or terminal and run:

```bash
mongosh
```

You’ll see a shell like this:

```
test>
```

---

## ✅ Step 3: Connect to MongoDB (optional if localhost)

```bash
mongosh "mongodb://localhost:27017"
```

---

## 🗂️ Step 4: MongoDB Basic Commands

### 🔍 Show All Databases

```js
show dbs
```

### 📂 Use/Create a Database

```js
use latest_db
```

---

## 📁 Collection: students

### ➕ Insert One Document

```js
db.students.insertOne({ name: "ram", age: 12 })
```

### 🔎 Show All Documents

```js
db.students.find()
```

---

### 🔁 Update One Document

```js
db.students.updateOne(
  { name: "motu" },
  {
    $set: {
      idCards: {
        hasPanCard: true,
        hasAdharCard: true
      }
    }
  }
)
```

---

### 🔁 Update Many Documents

```js
db.students.updateMany(
  {},
  { $set: { hobbies: ["anime", "cooking"] } }
)
```

---

### 🔍 Find Documents with Pan Card

```js
db.students.find({ "idCards.hasPanCard": true })
```

---

### 🔍 Find One Document with Pan Card

```js
db.students.findOne({ "idCards.hasPanCard": true })
```

---

## 🧼 Extra Useful Commands

### ❌ Delete One Document

```js
db.students.deleteOne({ name: "ram" })
```

### ❌ Delete Many Documents

```js
db.students.deleteMany({ age: { $lt: 18 } })
```

---

## 📌 Notes

* MongoDB stores data in **collections** (like tables).
* Each document is in **JSON format**.
* Shell uses JavaScript syntax.
* All commands are **case-sensitive**.



