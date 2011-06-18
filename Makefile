build_path = build

quality = ${build_path}/clover.xml

all: ${quality}

# Generates output regarding code quality assurance
${quality}: ${build_path}
	@@phpmd . xml codesize > $@

# Runs common setup routines for the build process
${build_path}:
	@@mkdir -p $(build_path)

# Cleans up any files that we might have lying around from previous builds.
clean:
	@@rm -rf ${build_path}

.PHONY: all clean

