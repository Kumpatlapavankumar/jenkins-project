pipeline {
    agent any

    environment {
        COMPOSE_FILE = 'docker-compose.yml'
    }

    stages {
        stage('Checkout Code') {
            steps {
                git 'https://github.com/Kumpatlapavankumar/jenkins-project.git'  // Replace with your repo
            }
        }

        stage('Start Containers') {
            steps {
                sh 'docker-compose up -d'
            }
        }

        stage('Wait for Services') {
            steps {
                echo "Waiting for services to be ready..."
                sleep time: 15, unit: 'SECONDS'
            }
        }

        stage('Run Basic Test') {
            steps {
                script {
                    // Check if PHP container is responding
                    def result = sh(script: "curl -s http://localhost | grep -i '<strong>php_docker_table1'", returnStatus: true)
                    if (result != 0) {
                        error("PHP page not responding or database not connected properly")
                    }
                }
            }
        }

        stage('Run Hello Test') {
            steps {
                sh "curl -s http://localhost/test.php | grep 'Hello World!'"
            }
        }

        stage('Stop Containers') {
            steps {
                sh 'docker-compose down'
            }
        }
    }

    post {
        always {
            echo "Cleaning up..."
            sh 'docker-compose down -v || true'
        }
    }
}
