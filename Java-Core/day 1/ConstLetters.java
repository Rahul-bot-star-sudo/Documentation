public class  ConstLetters {
	public static void main (String [] args){
	//Declear string 
	String str = "Hello Java";
	int vowels = 0, consonants = 0;
	str = str.toLowerCase();
	for(int i = 0; i < str.length(); i++){
		char ch= str.charAt(i);
		if(Character.isLetter(ch)){
			if("aeiou".indexOf(ch) != -1)
				vowels++;
			else
				consonants++;
		}
	}

	System.out.println("Vowels: " + vowels + ", Consonant: " + consonants);

	}
}
	 