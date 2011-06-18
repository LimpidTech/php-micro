build_path = build
logs_path = ${build_path}/logs
conf_path = conf
source_path = src

quality = ${conf_path}/phpmd.xml
quality_out = ${logs_path}/pmd.xml
sloc_out = ${logs_path}/phploc.csv

standards_out = ${logs_path}/checkstyle.xml
duplicates_out = ${logs_path}/phpcpd.xml

all: ${quality_out} ${standards_out} $(duplicates_out) $(sloc_out)

# Generates output regarding code quality assurance
${quality_out}: init_build
	@@echo "Checking code quality."
	@@phpmd ${source_path} xml ${quality} --reportfile ${quality_out}

# Generates reports on issues regarding PHP standard code-style
${standards_out}: init_build
	@@echo "Checking code for standards compliance."
	@@phpcs --report=checkstyle --extensions=php --tab-width=4 \
	        --report-width=79 --standard=Zend \
	        ${source_path} > ${standards_out}

# Build phase for generating information regarding counting lines of code
$(sloc_out): init_build
	@@echo "Generating SLOC report."
	@@phploc --log-csv $(sloc_out) $(source_path)

# Makes sure that our code is nice and DRY.
$(duplicates_out): init_build
# We shouldn't be hiding errors into /dev/null, but this program
# throws errors no matter how you use it - and no matter how your
# code works. So, we do it anyway. This wont hurt the result as
# far as the build is concerned.

	@@echo "Checking code for unnecessary duplicate code."
	@@phpcpd --log-pmd $(duplicates_out) $(source_path) 2> /dev/null

# Sets up various build paths
init_build: ${build_path} ${logs_path}

${build_path} $(logs_path):
	@@mkdir -p $@

# Cleans up any files that we might have lying around from previous builds.
clean:
	@@rm -rf ${build_path}
	@@rm -rf ${logs_path}

.PHONY: all clean init_build

