package main

import (
	"bufio"
	"fmt"
	"log"
	"os"
	"strconv"
)

// Answer - структура вариантов ответа
type Answer struct {
	Text  string `json:"text"`
	Value string `json:"val"`
}

// Question - структура одного вопроса
type Question struct {
	Text        string    `json:"text"`
	Description string    `json:"desc"`
	Answers     []*Answer `json:"answ"`
}

// Quiz - общая структура опросника
type Quiz struct {
	Header    string      `json:"header"`
	Questions []*Question `json:"questions"`
}

func (a *Answer) generateAnswer(out *bufio.Writer, cid int, qid int, aid *int) {
	sid := strconv.Itoa(cid) + "-" + strconv.Itoa(qid) + "-" + a.Value
	fmt.Fprintf(out, answerFmt, sid, cid, qid, a.Value, sid, a.Text)
}

func (q *Question) generateQuestion(out *bufio.Writer, cid int, qid int, aid *int) {
	fmt.Fprintf(out, questionHeadFmt, q.Text)
	if len(q.Description) != 0 {
		fmt.Fprintf(out, questionDescFmt, q.Description)
	}
	for _, a := range q.Answers {
		a.generateAnswer(out, cid, qid, aid)
		*aid++
	}
	fmt.Fprintf(out, questionEndFmt)
}

func (q *Quiz) generateQuiz(outputFile string) {
	file, err := os.Create(outputFile)
	if err != nil {
		log.Fatalln(err.Error())
	}
	out := bufio.NewWriter(file)
	fmt.Fprintf(out, quizHeadFmt)
	aid := 0
	for cid := 0; cid < maxCand; cid++ {
		fmt.Fprintf(out, candHeadFmt, cid)
		for qid, q := range q.Questions {
			q.generateQuestion(out, cid, qid, &aid)
		}
		fmt.Fprintf(out, quizNextBtn)
		if cid != 0 {
			fmt.Fprintf(out, quizSubmitBtn)
		}
		fmt.Fprintf(out, candEndFmt)
	}
	fmt.Fprintf(out, quizEndFmt)
	out.Flush()
	log.Println("Generated file:", outputFile)
}
