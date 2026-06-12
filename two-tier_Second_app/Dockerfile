FROM python:3.9

WORKDIR /python

COPY requirements.txt .

RUN pip install Flask mysqlclient flask-mysqldb

COPY app.py .

EXPOSE 5000

CMD ["python", "app.py"]
