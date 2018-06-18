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
	Type        string    `json:"type"`
	Description string    `json:"desc"`
	Answers     []*Answer `json:"answ"`
}

// Quiz - общая структура опросника
type Quiz struct {
	Path      string      `json:"path"`
	CountMin  int         `json:"min,int"`
	CountMax  int         `json:"max,int"`
	Questions []*Question `json:"questions"`
}

func (a *Answer) generateAnswer(out *bufio.Writer, cid int, qid int, aid *int) {
	sid := strconv.Itoa(cid) + "-" + strconv.Itoa(qid) + "-" + a.Value
	fmt.Fprintf(out, answerFmt, sid, cid, qid, a.Value, sid, a.Text)
}

func (a *Answer) generateOption(out *bufio.Writer) {
	fmt.Fprintf(out, answerFmtOption, a.Value, a.Text)
}

func (q *Question) generateQuestion(out *bufio.Writer, cid int, qid int, aid *int) {
	fmt.Fprintf(out, questionHeadFmt, q.Text)
	if len(q.Description) != 0 {
		fmt.Fprintf(out, questionDescFmt, q.Description)
	}
	switch q.Type {
	case "select":
		fmt.Fprintf(out, answerFmtSelectBeg, cid, qid)
		for _, a := range q.Answers {
			a.generateOption(out)
		}
		fmt.Fprintf(out, answerFmtSelectEnd)
	default:
		for _, a := range q.Answers {
			a.generateAnswer(out, cid, qid, aid)
			*aid++
		}
	}
	fmt.Fprintf(out, questionEndFmt)
}

func (q *Quiz) generateQuiz(outputFile string, maxCand int) {
	file, err := os.Create(outputFile)
	if err != nil {
		log.Fatalln(err.Error())
	}
	out := bufio.NewWriter(file)
	fmt.Fprintf(out, quizHeadFmt, q.Path)
	aid := 0
	for cid := 0; cid < maxCand; cid++ {
		fmt.Fprintf(out, candHeadFmt, cid, cid+1)
		for qid, q := range q.Questions {
			q.generateQuestion(out, cid, qid, &aid)
		}
		if cid+1 != maxCand {
			fmt.Fprintf(out, quizNextBtn, cid+2)
		}
		if cid != 0 {
			fmt.Fprintf(out, quizLastBtn, cid)
			fmt.Fprintf(out, quizSubmitBtn)
		}
		fmt.Fprintf(out, candEndFmt)
	}
	fmt.Fprintf(out, quizEndFmt)
	out.Flush()
	log.Println("Generated file:", outputFile)
}

func (q *Quiz) generateFiles(outputFmt string) {
	for count := q.CountMin; count <= q.CountMax; count++ {
		q.generateQuiz(fmt.Sprintf(outputFmt, count), count)
	}
}
