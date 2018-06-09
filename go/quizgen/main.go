package main

import (
	"encoding/json"
	"flag"
	"io/ioutil"
	"log"
)

func loadQuizFile(fileName string) *Quiz {
	log.Println("Loading JSON-file:", fileName)
	raw, err := ioutil.ReadFile(fileName)
	if err != nil {
		log.Fatalln(err.Error())
	}
	var q Quiz
	err = json.Unmarshal(raw, &q)
	if err != nil {
		log.Fatalln(err.Error())
	}
	log.Println("Loading success")
	return &q
}

func main() {
	inputName := flag.String("quiz", "data/quiz.json", "Quiz JSON file")
	outputName := flag.String("out", "data/out.html", "Output HTML file")
	flag.Parse()
	q := loadQuizFile(*inputName)
	q.generateQuiz(*outputName)
}
