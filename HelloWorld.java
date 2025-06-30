public class HelloWorld{                      

    /*
    public --> ye ek accessed modifier hai jo kahi pe bhi ham use kar sakate hai
    class --> class ye ek keyword hai jo java class define karane ke liye use karata hai.
    HelloWorld --> ye ek class ka name hai jo PascalCase convention me likha hai 
    {} --> this curlly brace is use to open and closed a body of class
    */

    public static void main(String arg []){         // in simple word it is a starting point of java program
        /*
        public --> ye keyword used to accessed any jvm muchine to accessed main method anywhere
        static --> isaka matalab hai ham method ka object banaye bina use call kar sakate hai
        void --> ye ek return type hai jo kuch bhi value return nahi kar raha
        main --> in java main is method to starting point in java
        String arg[] --> its means symple he take some text from the command line
        
        */
        System.out.println("Hello World");    // this line use for print the output
        /*
        
        System --> A built-in class in Java that has tools for input/output.
        out	--> A part of System that sends output to the screen.
        println() -->	A method that prints a line of text and moves the cursor to the next line.
        "Hello World" -->	This is the text that will be printed. It's inside double quotes because it's a string.
        ;	--> A semicolon ends the statement. Every Java statement ends with ;.

        */
    }
}