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
	if q.CountMin < 1 {
		log.Println("Incorrect min value:", q.CountMin)
		q.CountMin = 1
	}
	if q.CountMax < q.CountMin {
		log.Println("Incorrect max value:", q.CountMin)
		q.CountMax = q.CountMin + 1
	}
	log.Println("Loading success")
	return &q
}

func main() {
	inputName := flag.String("quiz", "data/quiz.json", "Quiz JSON file")
	outputName := flag.String("out", "data/out-%d.html", "Output files format")
	flag.Parse()
	q := loadQuizFile(*inputName)
	q.generateFiles(*outputName)
}
