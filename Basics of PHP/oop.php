<?php
class Book {
    private $title;
    private $author;
    private $publishDate;
    private $price;

    public function __construct($title, $author, $publishDate, $price) {
        $this->title = $title;
        $this->author = $author;
        $this->publishDate = $publishDate;
        $this->price = $price;
    }
    
    public function displayDetails() {
        echo "Title: $this->title\nAuthor: $this->author\nPublish Date: $this->publishDate\nPrice: $this->price\$\n";
    }
}

class Ebook extends Book {
    private $fileSize;
    
    public function __construct($title, $author, $publishDate, $price, $fileSize) {
        parent::__construct($title, $author, $publishDate, $price);
        $this->fileSize = $fileSize;
    }
    
    public function displayDetails() {
        parent::displayDetails();
        echo "File Size: $this->fileSize MB\n";
        
    }
}

$bookInstance = new Book("The Great Gatsby", "F. Scott Fitzgerald", "1925", 110);

$ebookInstance = new Ebook("1984", "George Orwell", "1949", 120, 1.5);

echo "Book Details:\n";
echo $bookInstance->displayDetails();

echo "Ebook Details:\n";
echo $ebookInstance->displayDetails();
?>
