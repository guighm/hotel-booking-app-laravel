FROM ubuntu:latest
LABEL authors="guighm"

ENTRYPOINT ["top", "-b"]
