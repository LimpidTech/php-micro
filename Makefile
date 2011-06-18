build_path = build

quality = ${build_path}/clover.xml

all: ${quality}

# Generates output regarding code quality assurance
${quality}: ${build_path}
	@@phpmd . xml codesize > $@

# Sets up our build path
${build_path}:
	@@mkdir -p $(build_path)

# Cleans up any files that we might have lying around from previous builds.
clean:
	@@rm -rf ${build_path}

.PHONY: all clean

