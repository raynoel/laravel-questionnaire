# Prof: Coder's Tape
# Gérer les bases de données relationelles avec Laravel

# Videos source sur YouTube
https://www.youtube.com/watch?v=a5STZK4ZQz0
https://www.youtube.com/watch?v=_SyG3HMv48k
https://www.youtube.com/watch?v=vmashFZ0RcI
https://www.youtube.com/watch?v=278wLsBYn7U

# installer les dépendances
npm install

# démarrer le serveur local
npm run dev

# construire pour la production avec minification
npm run build


#########################
* Classes avec relations imbriquées
# Questionnaire contient:                        'title' + 'purpose' + 'user_id_
# Question appartenant à un questionnaire:       'question' + 'questionnaire_id'
* Chaque question contient un choix de 4 réponses 
# Answer appartenant à une question:             'answer' + 'question_id'
* Sondage 
# Survey contient:                               'nom' + 'courriel' + 'questionnaire_id'
# SurveyResponse contient:                       'survey_id' + 'question_id' + 'response_id'
