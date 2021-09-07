# kryptonratkoja
Helps solve cypher crossword puzzles

This simple tool reads in a cypher crossword puzzle layout and generates HTML document from it. The document has the crossword puzzle and a box for solutions, and whenever a letter is entered into a box, the corresponding boxes are filled in the puzzle.

Currently only supports 25 letters for Finnish cypher puzzles.

## Usage

```
php create-html-file.php sample.txt > output.html
```

This will create the ready HTML document in `output.html`.

## Source file format

A sample file is provided in `sample.txt`. The file should have each box separated by a tab, with the number of the box or a '-' for a non-letter box. If all the rows in the puzzle are not the same width, the grid will be padded on the right side to match the longest row length.