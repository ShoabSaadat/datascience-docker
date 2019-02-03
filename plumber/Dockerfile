FROM shoaibsaadat/dsplumber
MAINTAINER Shoaib Saadat <shoaib.saadat@gmail.com>
WORKDIR '/home/' 

RUN apt-get update -qq && apt-get install -y \
git-core \
libssl-dev \
libcurl4-gnutls-dev

EXPOSE 4000
ENTRYPOINT ["R", "-e", "pr <- plumber::plumb(commandArgs()[6]); pr$run(host='0.0.0.0', port=4000)"]
CMD ["/usr/local/lib/R/site-library/plumber/examples/04-mean-sum/plumber.R"]
